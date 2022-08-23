import axios from '@/axios';

export default {
  getData: async () => {
    const { data } = await axios.get('data');

    return data;
  }
};