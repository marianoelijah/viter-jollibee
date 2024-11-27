import { imgPath } from '@/components/helpers/functions-general';
import { CheckCircle, CheckCircle2, Eye, EyeOff } from 'lucide-react';
import React from 'react'
import { Link } from 'react-router-dom';

const ForgotPassword = () => {
    const [theme, setTheme] = React.useState(localStorage.getItem("theme"));
    const [showPassword, setShowPassword] = React.useState(false);
    React.useEffect(() => {
        function setThemeColor() {
          const html = document.querySelector("html");
          html.setAttribute("class", "");
          html.classList.add(theme);
          setTheme(localStorage.getItem("theme"));
        }
    
        setThemeColor();
      }, [theme]);

  return (
    <main className='h-screen bg-primary center-all'>
        <div className='login-main bg-secondary max-w-[320px] w-full p-4 border border-line rounded-md '>
            <img src={`${imgPath}/jollibee-logo.webp`} alt="" 
            className='w-[150px] mx-auto mb-2'/>
            
            <div className='success-message mt-5'>
                <CheckCircle2 size={50}/>
                <p>We have sent the instruction on how to reset your password</p>
                <Link to="/admin/login" className='text-center block hover:text-accent'>
                Back to Login</Link>
            </div>


        <div>
          <h5 className='text-center'>Forgot Password</h5>
           <p className='mb-5 text-center'>
              Enter your registered email to reset your password
           </p>
            <form action="input-wrap">
                <label htmlFor="">Password</label>
                <input type={showPassword ? "text" : "password"} className='!py-2'/>
                <button className='absolute bottom-2.5 right-2' onClick={() => setShowPassword(!showPassword)} type="button">
                    {showPassword ?  <Eye size={18} />  :  <EyeOff size={18} /> }
                </button>

                <Link to="admin/forgot-password" className='text-xs italic hover:text-accent block text-right'>
                  Forgot Password
                </Link>

                <button className='btn btn-accent w-full center-all mt-5' onClick={() => setSuccess(true)}>
                    Reset Password
                </button>

                <Link to="/" className='text-sm text-center block mt-5 hover:text-accent'>
                  Go Back to Login
                </Link>
            </form>
            
        </div>
           
        </div>
    </main>
  )
}

export default ForgotPassword
