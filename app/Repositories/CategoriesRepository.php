<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use App\Models\Administrator;
use App\Models\Announcements;
use App\Models\Categories;
use App\Models\Company;
use App\Models\CompanyCertificates;
use App\Models\CompanyAnnouncementsFeatured;
use App\Models\CompanyImages;
use App\Models\Customer;
use App\Support\Cropper;
use App\Models\TypeCompanies;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CategoriesRepository
{

    public function getByName($name)
    {
        return Categories::where('name', $name)->first();
    }
}
