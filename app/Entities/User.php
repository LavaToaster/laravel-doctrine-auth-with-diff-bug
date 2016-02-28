<?php

namespace App\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use LaravelDoctrine\ACL\Contracts\HasRoles as HasRolesContract;
use LaravelDoctrine\ACL\Contracts\Role as RoleInterface;
use LaravelDoctrine\ACL\Mappings AS ACL;
use LaravelDoctrine\ACL\Roles\HasRoles;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use LaravelDoctrine\ORM\Auth\Authenticatable;

/**
 * @ORM\Entity()
 */
class User implements AuthenticatableContract, CanResetPasswordContract, AuthorizableContract, HasRolesContract
{
    use Authenticatable, Timestamps, CanResetPassword, Authorizable, HasRoles;

    /**
     * @ORM\Id()
     * @ORM\Column(type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     * @var string
     */
    protected $id;

    /**
     * @ACL\HasRoles()
     * @var ArrayCollection|RoleInterface[]
     */
    protected $roles;

    /**
     * @return ArrayCollection|RoleInterface[]
     */
    public function getRoles()
    {
        return $this->roles;
    }
}