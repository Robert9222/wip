import React from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import RegistrationForm from './RegistrationForm';
import LoginForm from './LoginForm';
import AdminPanel from './AdminPanel';

function App() {
    return (
        <Router>
            <Routes>
                <Route path="/register" element={<RegistrationForm />} />
                <Route path="/login" element={<LoginForm />} />
                <Route path="/admin" element={<AdminPanel />} />
            </Routes>
        </Router>
    );
}
export default App;