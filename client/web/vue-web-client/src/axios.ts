import axios from 'axios';

const instance = axios.create({
  baseURL: 'https://server.test/api',
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
  },
  timeout: 60000,
});

instance.interceptors.request.use(request => {
  const token = window.localStorage.getItem('token');
  if (token) {
    request.headers.common['Authorization'] = `Bearer ${token}`;
  }

  return request;
});

export default instance;

