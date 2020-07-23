<?php

namespace App\Utils;

class GenerateUtils
{
    public static function generateInsertTenantObject($name, $email, $contact, $staff_number, $department, $status)
    {
        $object = (object) ['name' => $name,
            'email' => $email,
            'contact' => $contact,
            'staff_number' => $staff_number,
            'department' => $department,
            'status' => $status];
        return $object;
    }
}
