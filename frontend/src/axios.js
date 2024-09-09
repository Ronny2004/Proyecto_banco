// frontend/src/axios.js

import axios from 'axios';

// Configura la instancia de Axios
const instance = axios.create({
  baseURL: 'http://localhost:8000/api', // URL base de tu backend
  timeout: 1000,
  headers: {'Content-Type': 'application/json'}
});

export default instance;
