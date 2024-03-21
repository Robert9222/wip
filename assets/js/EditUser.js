import React, { useState, useEffect } from 'react';
import axios from 'axios';
import { useParams } from 'react-router-dom';

const EditUser = () => {
    const { userId } = useParams();
    const [userData, setUserData] = useState({ name: '', email: '' });

    useEffect(() => {
        const fetchUserData = async () => {
            try {
                const response = await axios.get(`/api/admin/users/${userId}`);
                setUserData(response.data);
            } catch (error) {
                console.error("Error fetching user data", error);
            }
        };

        fetchUserData();
    }, [userId]);

    const handleSubmit = async (event) => {
        event.preventDefault();
    };

    return (
        <form onSubmit={handleSubmit}>
            <input type="text" value={userData.name} /* ... */ />
            <input type="email" value={userData.email} /* ... */ />
            <button type="submit">Zapisz zmiany</button>
        </form>
    );
};

export default EditUser;