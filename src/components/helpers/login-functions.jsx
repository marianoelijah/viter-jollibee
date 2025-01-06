import { devNavUrl } from "./functions-general";

export const checkRoleToRedirect = (navigate, data) => {
  data.role_is_developer == 1
    ? navigate(`${devNavUrl}/${data.role_name.toLowerCase()}/`)
    : navigate(`${devNavUrl}/${data.role_name.toLowerCase()}/`);
};
