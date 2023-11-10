<?php

namespace App\Enums;

enum UserRole: string
{
  case Admin = 'admin';
  case Doctor = 'doctor';
  case Consultan = 'consultan';
}