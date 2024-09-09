// frontend/src/components/Settings.js

import React, { useEffect, useState } from 'react';
import axios from 'axios';

const Settings = () => {
    const [settings, setSettings] = useState([]);

    useEffect(() => {
        axios.get('/api/settings')
            .then(response => {
                setSettings(response.data);
            });
    }, []);

    const handleUpdate = (id, value) => {
        axios.put(`/api/settings/${id}`, { value })
            .then(response => {
                console.log('Settings updated', response.data);
            });
    };

    return (
        <div>
            {settings.map(setting => (
                <div key={setting.id}>
                    <label>{setting.key}</label>
                    <input
                        type="number"
                        value={setting.value}
                        onChange={(e) => handleUpdate(setting.id, e.target.value)}
                    />
                </div>
            ))}
        </div>
    );
};

export default Settings;
