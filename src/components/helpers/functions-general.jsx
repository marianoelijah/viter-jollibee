import React from "react";

const urlJollibeeLocal = "http://localhost/viter-jollibee"; //from thunder client
export const imgPath = "http://localhost/viter-jollibee/public/img"

// ONLINE DEV and LOCAL hris
export const devApiUrl = `${urlJollibeeLocal}/rest`;
export const devNavUrl = ""; //removed /v2
export const devBaseImgUrl = `${imgPath}`;
export const devBaseUrl = `${urlJollibeeLocal}`;

// dev key from thunder client
export const devKey =
  "$2a$12$47wDvbLInZif/PVS8B6P3.7WxyJvUpBzZAWCsnWJUKq3nrn4qgmeO";

// get focus on a button
export const GetFocus = (id) => {
  React.useEffect(() => {
    const obj = document.getElementById(id);
    obj.focus();
  }, []);
};