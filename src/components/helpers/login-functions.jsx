import { devNavUrl } from "./functions-general";

export const checkRoleToRedirect = (Navigate, data) => {
    data.role_is_developer == 1
      ? Navigate(`${devNavUrl}/${data.role_name.toLowerCase()}/`)
      : Navigate(`${devNavUrl}/${data.role_name.toLowerCase()}/`);
};