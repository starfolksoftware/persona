<?php

namespace StarfolkSoftware\Persona;

use Illuminate\Support\Str;

trait HasRole
{
    /**
     * Returns the user's role.
     *
     * @return \StarfolkSoftware\Persona\Role
     */
    public function role(): Role
    {
        $role = $this->role;

        return Persona::findRole($role);
    }

    /**
     * Checks if the user has the given role.
     *
     * @param  string  $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Get the user's permissions.
     *
     * @return array
     */
    public function permissions(): array
    {
        return (array) optional($this->role())->permissions;
    }

    /**
     * Checks if the user has the given permission.
     *
     * @param  string  $permission
     * @return bool
     */
    public function hasPermission(string $permission): bool
    {
        $permissions = $this->permissions();

        return in_array($permission, $permissions) ||
                in_array('*', $permissions) ||
                (Str::endsWith($permission, ':create') && in_array('*:create', $permissions)) ||
                (Str::endsWith($permission, ':update') && in_array('*:update', $permissions));
    }
}
