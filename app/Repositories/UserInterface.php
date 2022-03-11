<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

interface UserInterface {
    public function setDefaultAddress($id);
    public function getAllAddressOfUser();
    public function getAvatarUser($id);
    public function getRoleUser($id);
    public function getNameCity($id);
    public function getNameDist($id);
    public function getNameWard($id);
    public function getUser($id);
}
