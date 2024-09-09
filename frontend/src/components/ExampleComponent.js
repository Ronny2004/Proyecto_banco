// frontend/src/components/ExampleComponent.js
import React, { useEffect, useState } from 'react';
import axios from '../axios'; // Importa la instancia de axios

const ExampleComponent = () => {
  const [data, setData] = useState([]);

  useEffect(() => {
    axios.get('/example-endpoint') // Endpoint de tu API
      .then(response => {
        setData(response.data);
      })
      .catch(error => {
        console.error('Error fetching data:', error);
      });
  }, []);

  return (
    <div>
      <h1>Data from API:</h1>
      <pre>{JSON.stringify(data, null, 2)}</pre>
    </div>
  );
};

export default ExampleComponent;
