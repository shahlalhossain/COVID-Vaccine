<?php

namespace App\Services;

use App\Exceptions\GeneralException;
use App\Models\VaccineNotification;
use Exception;

class VaccineNotificationService extends BaseService
{
    public function store(array $data = []) : VaccineNotification
    {
        try {
            $notificationObj           = new VaccineNotification();
            $notificationObj->user_id  = $data['user_id'];
            $notificationObj->save();

            return $notificationObj;
        } catch (Exception $exception) {
            throw new GeneralException(__('There was a technical problem on vaccine notification store. Please try again.'.$exception->getMessage()));
        }
    }
}
