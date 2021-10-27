<?php

function removePermissionUser($user, $permissao)
{
    $user->revokePermissionTo($permissao);

    return redirect()->route('users.show', $user->id)
        ->with('success', 'Permissão removido com sucesso!');
}