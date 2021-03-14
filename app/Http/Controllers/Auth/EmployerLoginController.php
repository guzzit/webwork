<?php

 

namespace App\Http\Controllers\Auth;

 

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

use Auth;

use Route;

 

class EmployerLoginController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | Login Controller

    |--------------------------------------------------------------------------

    |

    | This controller handles authenticating users for the application and

    | redirecting them to your home screen. The controller uses a trait

    | to conveniently provide its functionality to your applications.

    |

    */

 

    use AuthenticatesUsers;

 

    protected $guard = 'employer';

 

    /**

     * Where to redirect users after login.

     *

     * @var string

     */

    protected $redirectTo = '/home';

 

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        // $this->middleware('guest')->except('logout');
         $this->middleware('guest:employee')->except('logout');
         $this->middleware('guest:employer')->except('logout');
        // $this->middleware('guest:employer', ['except' => ['logout']]);
        // $this->middleware('guest:employee', ['except' => ['logout']]);
        // $this->middleware('guest', ['except' => ['logout']]);

    }

 

    public function showLoginForm()

    {

        return view('auth.employerLogin');

    }

 

    public function login(Request $request)

    {

        if (Auth::guard('employer')->attempt(['email' => $request->email, 'password' => $request->password], true)) {

            return redirect()->intended('posts');

        }

 

        return back()->withErrors(['email' => 'Email or password are wrong.']);

    }
    public function logout()
    {
        Auth::guard('employer')->logout();
        return redirect('/posts');
    }

}