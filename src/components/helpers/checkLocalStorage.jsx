export const checkLocalStorage = () => {
    let jollibeetoken = null;
  
    try {
      jollibeetoken = JSON.parse(localStorage.getItem("jollibeetoken"));
    } catch (error) {
      jollibeetoken = null;
    }
  
    return jollibeetoken;
  };