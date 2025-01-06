import React from "react";
import { StoreContext } from "../store/storeContext";
import { queryData } from "../helpers/queryData";
import { checkLocalStorage } from "../helpers/checkLocalStorage";
import { setIsLogin } from "../store/storeAction";
import { checkRoleToRedirect } from "../helpers/login-functions";

const useDeveloperLogin = ( navigate ) => {
  const { dispatch, store } = React.useContext(StoreContext);
  const [loginLoading, setLoginLoading] = React.useState(true);

  React.useEffect(() => {
    setLoginLoading(true);
    const fetchLogin = async () => {
      const login = await queryData("/v2/developer/token", "post", {
        token: checkLocalStorage().token,
      });

      if (typeof login === "undefined" || !login.success) {
        localStorage.removeItem("jollibeetoken");
        setLoginLoading(false);
      } else {
        setLoginLoading(false);
        checkRoleToRedirect(navigate, login.data);
      }
    };

    if (
      checkLocalStorage() !== null &&
      checkLocalStorage().token !== undefined
    ) {
      fetchLogin();
      dispatch(setIsLogin(false));
    } else {
      setLoginLoading(false);
      dispatch(setIsLogin(true));
    }
  }, []);
  return { loginLoading };
};

export default useDeveloperLogin;