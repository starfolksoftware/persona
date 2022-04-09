<?php

namespace StarfolkSoftware\Persona;

final class Persona
{
    /**
     * The roles that are available to assign to users.
     *
     * @var array
     */
    public static $roles = [];

    /**
     * The permissions that exist within the application.
     *
     * @var array
     */
    public static $permissions = [];

    /**
     * Checks if app has registered roles.
     *
     * @return bool
     */
    public static function hasRoles(): bool
    {
        return ! empty(static::$roles);
    }

    /**
     * Checks if app has registered permissions.
     *
     * @return bool
     */
    public static function hasPermissions(): bool
    {
        return ! empty(static::$permissions);
    }

    /**
     * Find the role with the given key.
     *
     * @param  string  $key
     * @return \StarfolkSoftware\Persona\Role
     */
    public static function findRole(string $key): Role
    {
        return static::$roles[$key] ?? null;
    }

    /**
     * Define a role.
     *
     * @param  string  $key
     * @param  string  $name
     * @param  array  $permissions
     * @return \StarfolkSoftware\Persona\Role
     */
    public static function role(string $key, string $name, array $permissions): Role
    {
        static::$permissions = collect(array_merge(static::$permissions, $permissions))
            ->unique()
            ->sort()
            ->values()
            ->all();

        return tap(new Role($key, $name, $permissions), function ($role) use ($key) {
            static::$roles[$key] = $role;
        });
    }

    /**
     * Define the available permissions.
     *
     * @param  array  $permissions
     * @return static
     */
    public static function permissions(array $permissions)
    {
        static::$permissions = $permissions;

        return new static();
    }

    /**
     * Return the permissions in the given list that are actually defined permissions for the application.
     *
     * @param  array  $permissions
     * @return array
     */
    public static function validPermissions(array $permissions)
    {
        return array_values(array_intersect($permissions, static::$permissions));
    }
}
