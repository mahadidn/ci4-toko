<?php

namespace App\Controllers\Admin\Master;

use App\Controllers\BaseController;
use App\Models\Login;
use App\Models\Member;
class UserController extends BaseController
{
    protected $memberModel;

    public function __construct()
    {
        $this->memberModel = new Member();
    }

    public function index()
    {
        $userId = 1; // In a real app, this would come from session
        $data = $this->memberModel
        ->select('member.*, login.user')
        ->join('login', 'login.id_member = member.id_member', 'left')
        ->find($userId);
    

        return view('admin/master/user/index', ['data' => $data]);
    }

    public function updateProfileImage()
{
    $userId = $this->request->getPost('id');
    $oldImage = $this->request->getPost('foto2');

    // Allowed image types
    $allowedImageTypes = [
        'image/gif', 
        'image/jpg', 
        'image/jpeg', 
        'image/pjpeg', 
        'image/png', 
        'image/x-png'
    ];

    $imageFile = $this->request->getFile('foto');

    // Validation checks
    if (!$imageFile->isValid()) {
        return redirect()->back()->with('error', 'Error in File Upload');
    }

    // Check file type
    if (!in_array($imageFile->getMimeType(), $allowedImageTypes)) {
        return redirect()->back()->with('error', 'Only JPG, PNG, and GIF files are allowed');
    }

    // Check file size (4MB = 4096 KB)
    if ($imageFile->getSize() / 1024 > 4096) {
        return redirect()->back()->with('error', 'File size cannot exceed 4 MB');
    }

    // Generate unique filename
    $newFileName = $imageFile->getRandomName();
    $uploadPath = ROOTPATH . 'public/assets/img/user/';

    // Move uploaded file
    $imageFile->move($uploadPath, $newFileName);

    // Remove old image if exists
    $oldImagePath = $uploadPath . $oldImage;
    if (file_exists($oldImagePath) && $oldImage != 'default.jpg') {
        unlink($oldImagePath);
    }

    // Update database
    $this->memberModel->update($userId, ['gambar' => $newFileName]);
    session()->set('gambar', $newFileName);

    return redirect()->back()->with('success', 'Profile image updated successfully');
}

public function updateProfile()
{
    $userId = $this->request->getPost('id');

    // Validation rules
    $validationRules = [
        'nama' => 'required|max_length[255]',
        'alamat' => 'required',
        'tlp' => 'required|max_length[255]',
        'email' => 'required|valid_email|max_length[255]',
        'nik' => 'required'
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Prepare data
    $data = [
        'nm_member' => $this->request->getPost('nama'),
        'alamat_member' => $this->request->getPost('alamat'),
        'telepon' => $this->request->getPost('tlp'),
        'email' => $this->request->getPost('email'),
        'NIK' => $this->request->getPost('nik')
    ];

    // Update profile
    $this->memberModel->update($userId, $data);

    return redirect()->back()->with('success', 'Profile updated successfully');
}

public function changePassword()
{
    $userId = $this->request->getPost('id');
    $username = $this->request->getPost('user');
    $newPassword = $this->request->getPost('pass');

    // Validation rules
    $validationRules = [
        'user' => 'required|max_length[255]',
        'pass' => 'required|min_length[8]'
    ];

    if (!$this->validate($validationRules)) {
        return redirect()->back()->with('error', 'Invalid username or password');
    }

    // You'll need to create a separate login model for this
    $loginModel = new Login(); // Assuming you create this model

    // Update login credentials
    $loginModel->where('id_member', $userId)->set([
        'user' => $username,
        'pass' => md5($newPassword) // Note: MD5 is not secure. Use password_hash() instead
    ])->update();

    return redirect()->back()->with('success', 'Password updated successfully');
}
}
