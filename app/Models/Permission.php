<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;

    public static function defaultPermissions()
    {
        return [
            array('name' => 'permissions_view', 'description' => 'Visualiza as permissões'),
            array('name' => 'permissions_create', 'description' => 'Cria permissões'),
            array('name' => 'permissions_edit', 'description' => 'Edita permissões'),
            array('name' => 'permissions_delete', 'description' => 'Deleta permissões'),

            array('name' => 'users_view', 'description' => 'Visualiza  usuários'),
            array('name' => 'users_create', 'description' => 'Cria usuários'),
            array('name' => 'users_edit', 'description' => 'Edita usuários'),
            array('name' => 'users_delete', 'description' => 'Deleta usuários'),

            array('name' => 'admin_view', 'description' => 'Visualiza o Admin'),
            array('name' => 'admin_create', 'description' => 'Cria o Admin'),
            array('name' => 'admin_edit', 'description' => 'Edita o Admin'),
            array('name' => 'admin_delete', 'description' => 'Deleta o Admin'),

            array('name' => 'post_view', 'description' => 'Visualiza o Post'),
            array('name' => 'post_create', 'description' => 'Cria o Post'),
            array('name' => 'post_edit', 'description' => 'Edita o Post'),
            array('name' => 'post_delete', 'description' => 'Deleta o Post'),
        ];
    }
}
