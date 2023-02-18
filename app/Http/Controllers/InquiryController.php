<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\Inquery;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class InquiryController extends Controller
{
    public function inquerySubmission(Request $request)
    {
        try {

            $users = User::role('staff_member')->get();
            $product_id = $request->productId;
            $username = $request->username;
            $email = $request->email;
            $contact_number = $request->contactNumber;
            $question = $request->question;

            try {
                
                Notification::send($users, new Inquery($product_id, $username, $email, $contact_number, $question));

            } catch (\Throwable $th) {
                //throw $th;
                Log::error("Inquery Mail Error : ".$th->getMessage());
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Your inquery is submitted successfully!',
            ])->setStatusCode(200);
            
        } catch (\Throwable $th) {
            //throw $th;
            Log::error("Inquery Mail Function Error : ".$th->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong!',
            ])->setStatusCode(561);
        }
    }
}
