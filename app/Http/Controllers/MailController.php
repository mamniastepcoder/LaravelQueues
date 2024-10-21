<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Questestmail;
use App\Jobs\SendEmailJob;

class MailController extends Controller
{
    public function index()
    {
        return view('Queuemail');
    }
      public function sendEmail(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'emails' => 'required|string',
        ]);
        $emails = array_map('trim', explode(',', $data['emails']));
        foreach ($emails as $email) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    SendEmailJob::dispatch([
                        'name' => $data['name'],
                        'email' => $email,
                    ]);
                } else {
                    return redirect()->back()->with('error', "  Invalid email : $email");
                }
            }
        return redirect()->back()->with('success', 'Your emails were successfully sent.');
        }
}
    


