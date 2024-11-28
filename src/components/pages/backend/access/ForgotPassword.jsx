import { imgPath } from "@/components/helpers/functions-general";
import { ArrowLeft, CheckCircle2, Eye, EyeOff, MailCheck } from "lucide-react";
import React from "react";
import { Link } from "react-router-dom";

const ForgotPassword = () => {
  const [theme, setTheme] = React.useState(localStorage.getItem("theme"));
  const [success, setSuccess] = React.useState(false);

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
    <main className="h-screen bg-primary  center-all">
      <div className="login-main bg-secondary max-w-[320px] w-full p-4 border border-line rounded-md ">
        <img
          src={`${imgPath}/jollibee-logo.webp`}
          alt=""
          className="w-[200px] mx-auto mb-2"
        />
        {success ? (
          <div className="success-message mt-5">
            <MailCheck size={50} stroke={"green"} className="mx-auto" />
            <p> We have sent the instructions on how to reset your password</p>
            <Link
              to="/admin/login"
              className="text-center block hover:text-accent"
            >
              {" "}
              Back to Login
            </Link>
          </div>
        ) : (
          <form action="">
            <h5 className="text-center">Forgot Password</h5>

            <p className="mb-5 text-center">
              Enter your registered email to reset your password
            </p>
            <div className="input-wrap">
              <label htmlFor="">Email</label>
              <input type="text" className="!py-2" />
            </div>

            <button
              className="btn btn-accent w-full center-all mt-5"
              onClick={() => setSuccess(true)}
            >
              Reset Password
            </button>

            <Link
              to="/"
              className="text-sm text-center block mt-5 hover:text-accent"
            >
              Go Back to Login
            </Link>
          </form>
        )}
      </div>
    </main>
  );
};

export default ForgotPassword;