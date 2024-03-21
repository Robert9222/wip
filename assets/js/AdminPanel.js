import React, {useEffect, useState} from 'react';
import axios from 'axios';

const AdminPanel = () => {
    const [users, setUsers] = useState([]);
    const [editUser, setEditUser] = useState(null);

    useEffect(() => {
        axios.get('/api/admin')
            .then(response => {
                setUsers(response.data);
            })
            .catch(error => {
                console.error("Błąd przy pobieraniu danych użytkowników: ", error);
            });
    }, []);

    const handleEditClick = (user) => {
        setEditUser(user);
    };

    const handleUpdateUser = () => {
        axios.post(`/api/admin/${editUser.id}/edit`, editUser)
            .then(response => {
                console.log(response.data.message);
                fetchUsers();
                setEditUser(null); // Zamknij formularz edycji
            })
            .catch(error => {
                console.error("Błąd przy aktualizacji użytkownika: ", error);
            });
    };


    const fetchUsers = () => {
        axios.get('/api/admin')
            .then(response => {
                setUsers(response.data);
            })
            .catch(error => {
                console.error("Błąd przy pobieraniu danych użytkowników: ", error);
            });
    };
    const handleDelete = (userId) => {
        if (window.confirm("Czy na pewno chcesz usunąć tego użytkownika?")) {
            axios.delete(`/api/admin/${userId}`)
                .then(response => {
                    console.log(response.data.message);
                    fetchUsers();
                })
                .catch(error => {
                    console.error("Błąd przy usuwaniu użytkownika: ", error);
                });
        }
    };

    return (
        <div>
            <h2>Panel Admina</h2>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>Email</th>
                    <th>Akcje</th>
                </tr>
                </thead>
                <tbody>
                {users.map(user => (
                    <tr key={user.id}>
                        <td>{user.id}</td>
                        <td>{user.firstName}</td>
                        <td>{user.lastName}</td>
                        <td>{user.email}</td>
                        <td>
                            <button onClick={() => handleEditClick(user)}>Edytuj</button>
                            <button onClick={() => handleDelete(user.id)}>Usuń</button>
                        </td>
                    </tr>
                ))}
                {editUser && (
                    <div>
                        <h3>Edytuj Użytkownika</h3>
                        <form onSubmit={handleUpdateUser}>
                            <input type="text" value={editUser.firstName}
                                   onChange={(e) => setEditUser({...editUser, firstName: e.target.value})}/>
                            <input type="text" value={editUser.lastName}
                                   onChange={(e) => setEditUser({...editUser, lastName: e.target.value})}/>

                            <button type="submit">Zapisz</button>
                            <button onClick={() => setEditUser(null)}>Anuluj</button>
                        </form>
                    </div>
                )}
                </tbody>
            </table>
        </div>
    );
};

export default AdminPanel;