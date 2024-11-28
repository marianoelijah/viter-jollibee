import { imgPath } from "@/components/helpers/functions-general";
import { ArrowLeft, Eye, EyeOff } from "lucide-react";
import React from "react";
import { Link } from "react-router-dom";

const Login = () => {
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
    <main className="h-screen bg-primary center-all">
      <div className="login-main bg-secondary max-w-[320px] w-full p-4 border border-line rounded-md ">
        <img
          src={`${imgPath}/jollibee-logo.webp`}
          alt=""
          className="w-[200px] mx-auto mb-2"
        />
        <form action="">
          <h5 className="text-center">Welcome to Jollibee Kiosk!</h5>
          
          <div className="input-wrap">
            <label htmlFor="">Username</label>
            <input type="text" className="!py-2" />
          </div>
          <div className="input-wrap">
            <label htmlFor="">Password</label>
            <input
              type={showPassword ? "text" : "password"}
              className="!py-2"
            />
            <button
              className="absolute bottom-2.5 right-2"
              onClick={() => setShowPassword(!showPassword)}
              type="button"
            >
              {showPassword ? <EyeOff size={18} /> : <Eye size={18} />}
            </button>
          </div>
          <Link
            to="/admin/forgotpassword"
            className="text-xs italic hover:text-accent block text-right"
          >
            Forgot Password
          </Link>
          <button className="btn btn-accent w-full center-all mt-5">
            Login
          </button>
          <Link
            to="/"
            className="text-sm text-center block mt-5 hover:text-accent"
          >
            Go Back to Kiosk
          </Link>
        </form>
      </div>
    </main>
  );
};

export default Login;