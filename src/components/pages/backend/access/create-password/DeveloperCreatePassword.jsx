import { InputText } from "@/components/helpers/FormInputs";
import { getUrlParam, imgPath } from "@/components/helpers/functions-general";
import { Form, Formik } from "formik";
import { CheckCircle2, Eye, EyeOff, ShieldCheck } from "lucide-react";
import React from "react";
import { Link, useNavigate } from "react-router-dom";
import * as Yup from "Yup";
import SpinnerButton from "../../partials/spinners/SpinnerButton";
import useQueryData from "@/components/custom-hook/useQueryData";
import { StoreContext } from "@/components/store/storeContext";
import { useMutation, useQueryClient } from "@tanstack/react-query";
import { setError, setMessage } from "@/components/store/storeAction";
import { queryData } from "@/components/helpers/queryData";

const DeveloperCreatePassword = () => {
  const { dispatch, store } = React.useState(StoreContext);
  const [theme, setTheme] = React.useState(localStorage.getItem("theme"));
  const [showPassword, setShowPassword] = React.useState(false);
  const [showConfirmPassword, setShowConfirmPassword] = React.useState(false);
  const [showIconPassword, setShowIconPassword] = React.useState(false);
  const [showIconConfirmPassword, setShowIconConfirmPassword] =
    React.useState(false);
  const [success, setSuccess] = React.useState(false);

  const [lowerValidated, setLowerValidated] = React.useState(false);
  const [upperValidated, setUpperValidated] = React.useState(false);
  const [numberValidated, setNumberValidated] = React.useState(false);
  const [specialValidated, setSpecialValidated] = React.useState(false);
  const [lengthValidated, setLengthValidated] = React.useState(false);
  const paramKey = getUrlParam().get("key");
  const queryClient = useQueryClient();
  const navigate = useNavigate;

  const { isLoading, data: key } = useQueryData(
    `/v2/developer/key/${paramKey}`,
    "get",
    "developer/key"
  );

  const mutation = useMutation({
    mutationFn: (values) => queryData(`/v2/developer/password`, "post", values),
    onSuccess: (data) => {
      queryClient.invalidateQueries({
        queries: ["developer"],
      });

      if (!data.success) {
        dispatch(setError(true));
        dispatch(setMessage(data.error));
      } else {
        setSuccess(true);
      }
    },
  });

  React.useEffect(() => {
    function setThemeColor() {
      const html = document.querySelector("html");
      html.setAttribute("class", "");
      html.classList.add(theme);
      setTheme(localStorage.getItem("theme"));
    }

    setThemeColor();
  }, [theme]);

  const handleChangePasswordInput = (e) => {
    if (e.target.value === "") {
      setShowIconPassword(false);
    } else {
      setShowIconPassword(true);
    }

    const lower = new RegExp("(?=.*[a-z])");
    const upper = new RegExp("(?=.*[A-Z])");
    const number = new RegExp("(?=.*[0-9])");
    const special = new RegExp("(?=.[!@#$%^&`{;:',<.>/?}_-])");
    const length = new RegExp("(?=.{8,})");

    if (lower.test(e.target.value)) {
      setLowerValidated(true);
    } else {
      setLowerValidated(false);
    }
    if (upper.test(e.target.value)) {
      setUpperValidated(true);
    } else {
      setUpperValidated(false);
    }
    if (number.test(e.target.value)) {
      setNumberValidated(true);
    } else {
      setNumberValidated(false);
    }
    if (special.test(e.target.value)) {
      setSpecialValidated(true);
    } else {
      setSpecialValidated(false);
    }
    if (length.test(e.target.value)) {
      setLengthValidated(true);
    } else {
      setLengthValidated(false);
    }
  };

  const handleChangeConfirmPassword = (e) => {
    if (e.target.value === "") {
      setShowIconPassword(false);
    } else {
      setShowIconPassword(true);
    }
  };

  const initVal = {
    new_password: "",
    confirm_password: "",
    key: paramKey,
  };

  const yupSchema = Yup.object({
    new_password: Yup.string()
      .required("Required")
      .min(8, "At least 8 characters.")
      .matches("(?=.*[a-z])", "At least one lowercase letter.")
      .matches("(?=.*[A-Z])", "At least one uppercase letter.")
      .matches("(?=.[!@#$%^&`{;:',<.>/?}_-])", "Atleast 1 special character.")
      .matches("(?=.*[0-9])", "Atleast 1 number."),
    confirm_password: Yup.string()
      .required("Required")
      .oneOf([Yup.ref("new_password"), null], "Passwords does not match."),
  });

  return (
    <>
      <main className="h-screen bg-primary center-all">
        <div className="login-main bg-secondary max-w-[320px] w-full p-4 border border-line rounded-md ">
          <img
            src={`${imgPath}/jollibee-logo.webp`}
            alt=""
            className="w-[200px] mx-auto mb-2"
          />

          {success ? (
            <div className="success-message mt-5">
              <ShieldCheck size={50} stroke={"green"} className="mx-auto" />
              <p>
                Your password is ready to use. Click the button below to
                continue.
              </p>
            </div>
          ) : (
            <Formik
              initialValues={initVal}
              validationSchema={yupSchema}
              onSubmit={async (values) => {
                mutation.mutate(values);
                s;
              }}
            >
              {(props) => {
                return (
                  <Form>
                    <h5 className="text-center">Set Password</h5>

                    <div className="input-wrap">
                      <InputText
                        label="Password"
                        type={showPassword ? "text" : "password"}
                        className="!py-2"
                        name="new_password"
                        onChange={(e) => handleChangePasswordInput(e)}
                      />
                      {showIconPassword && (
                        <button
                          className="absolute bottom-2.5 right-2"
                          onClick={() => setShowPassword(!showPassword)}
                          type="button"
                        >
                          {showPassword ? (
                            <EyeOff size={18} />
                          ) : (
                            <Eye size={18} />
                          )}
                        </button>
                      )}
                    </div>
                    <div className="input-wrap">
                      <InputText
                        label="Confirm Password"
                        type={showPassword ? "text" : "password"}
                        className="!py-2"
                        name="confirm_password"
                        onChange={(e) => handleChangePasswordInput(e)}
                      />
                      {showIconConfirmPassword && (
                        <button
                          className="absolute bottom-2.5 right-2"
                          onClick={() =>
                            setShowConfirmPassword(!showConfirmPassword)
                          }
                          type="button"
                        >
                          {showConfirmPassword ? (
                            <EyeOff size={18} />
                          ) : (
                            <Eye size={18} />
                          )}
                        </button>
                      )}
                    </div>
                    <ul className="space-y-3 mt-3">
                      <li
                        className={`flex gap-2 items-center text-sm opacity-50 ${
                          lengthValidated ? "opacity-100" : ""
                        } `}
                      >
                        <CheckCircle2
                          size={16}
                          stroke={lengthValidated ? "green" : "white"}
                        />{" "}
                        At least 8 character
                      </li>
                      <li
                        className={`flex gap-2 items-center text-sm opacity-50 ${
                          upperValidated ? "opacity-100" : ""
                        } `}
                      >
                        <CheckCircle2
                          size={16}
                          stroke={upperValidated ? "green" : "white"}
                        />{" "}
                        At least 1 uppercase
                      </li>
                      <li
                        className={`flex gap-2 items-center text-sm opacity-50 ${
                          lowerValidated ? "opacity-100" : ""
                        } `}
                      >
                        <CheckCircle2
                          size={16}
                          stroke={lowerValidated ? "green" : "white"}
                        />{" "}
                        At least 1 lowercase
                      </li>
                      <li
                        className={`flex gap-2 items-center text-sm opacity-50 ${
                          numberValidated ? "opacity-100" : ""
                        } `}
                      >
                        <CheckCircle2
                          size={16}
                          stroke={numberValidated ? "green" : "white"}
                        />{" "}
                        At least 1 number
                      </li>
                      <li
                        className={`flex gap-2 items-center text-sm opacity-50 ${
                          specialValidated ? "opacity-100" : ""
                        } `}
                      >
                        <CheckCircle2
                          size={16}
                          stroke={specialValidated ? "green" : "white"}
                        />{" "}
                        At least 1 special character
                      </li>
                    </ul>

                    <button
                      className="btn btn-accent w-full center-all mt-5"
                      // onClick={() => setSuccess(true)}
                      disabled={
                        mutation.isPending ||
                        props.values.new_password === "" ||
                        props.values.confirm_password === ""
                      }
                      type="submit"
                    >
                      {mutation.isPending ? <SpinnerButton /> : "Set Password"}
                    </button>

                    <Link
                      to="/developer/login"
                      className="text-sm text-center block mt-5 hover:text-accent "
                    >
                      Go Back to Login
                    </Link>
                  </Form>
                );
              }}
            </Formik>
          )}
        </div>
      </main>
    </>
  );
};

export default DeveloperCreatePassword;
