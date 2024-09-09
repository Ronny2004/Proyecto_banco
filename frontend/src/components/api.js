// src/api.js
import axios from 'axios';

const api = axios.create({
    baseURL: 'http://localhost:8000/api',
    headers: {
        'Content-Type': 'application/json',
    },
});

export const fetchClients = () => api.get('/clients');
export const fetchLoans = () => api.get('/loans');
export const createClient = (data) => api.post('/clients', data);
export const createLoan = (data) => api.post('/loans', data);
