import axios from './../axios';

export const useCheckLogin = async () => {
  const token = window.localStorage.getItem('token');
  let isLoggedIn = false;

  if (token) {
    await axios.post('validate_token')
      .then((res) => {
        isLoggedIn = true;
      })
      .catch((error) => {
        if (error.response.status === 401) {
          isLoggedIn = false;
        }
      });
  }

  return isLoggedIn;
};