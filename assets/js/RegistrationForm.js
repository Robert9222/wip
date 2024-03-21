import React, { useState } from 'react';
import axios from 'axios';

const RegistrationForm = () => {
    const [formData, setFormData] = useState({
        firstName: '',
        lastName: '',
        email: '',
        description: '',
        position: '',
        testingSystems: '',
        reportingSystems: '',
        knowsSelenium: false,
        ideEnvironments: '',
        programmingLanguages: '',
        knowsMySQL: false,
        projectManagementMethodologies: '',
        knowsScrum: false
    });

    const handleChange = (e) => {
        const value = e.target.type === 'checkbox' ? e.target.checked : e.target.value;
        setFormData({ ...formData, [e.target.name]: value });
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        // Submit form data
        axios.post('/api/register', formData)
            .then(response => {
            })
            .catch(error => {
            });
    };

    return (
        <form onSubmit={handleSubmit}>
            <input
                type="text"
                name="firstName"
                value={formData.firstName}
                onChange={handleChange}
                placeholder="Imię"
                required
            />
            <input
                type="text"
                name="lastName"
                value={formData.lastName}
                onChange={handleChange}
                placeholder="Nazwisko"
                required
            />
            <input
                type="email"
                name="email"
                value={formData.email}
                onChange={handleChange}
                placeholder="Email"
                required
            />
            <textarea
                name="description"
                value={formData.description}
                onChange={handleChange}
                placeholder="Opis"
            />
            <select name="position" value={formData.position} onChange={handleChange} required>
                <option value="">Wybierz stanowisko</option>
                <option value="tester">Tester</option>
                <option value="developer">Developer</option>
                <option value="project_manager">Project Manager</option>
            </select>

            {formData.position === 'tester' && (
                <>
                    <input
                        type="text"
                        name="testingSystems"
                        value={formData.testingSystems}
                        onChange={handleChange}
                        placeholder="Systemy testujące"
                    />
                    <input
                        type="text"
                        name="reportingSystems"
                        value={formData.reportingSystems}
                        onChange={handleChange}
                        placeholder="Systemy raportowe"
                    />
                    <label>
                        Zna Selenium
                        <input
                            type="checkbox"
                            name="knowsSelenium"
                            checked={formData.knowsSelenium}
                            onChange={handleChange}
                        />
                    </label>
                </>
            )}

            {formData.position === 'developer' && (
                <>
                    <input
                        type="text"
                        name="ideEnvironments"
                        value={formData.ideEnvironments}
                        onChange={handleChange}
                        placeholder="Środowiska IDE"
                    />
                    <input
                        type="text"
                        name="programmingLanguages"
                        value={formData.programmingLanguages}
                        onChange={handleChange}
                        placeholder="Języki programowania"
                    />
                    <label>
                        Zna MySQL
                        <input
                            type="checkbox"
                            name="knowsMySQL"
                            checked={formData.knowsMySQL}
                            onChange={handleChange}
                        />
                    </label>
                </>
            )}

            {formData.position === 'project_manager' && (
                <>
                    <input
                        type="text"
                        name="projectManagementMethodologies"
                        value={formData.projectManagementMethodologies}
                        onChange={handleChange}
                        placeholder="Metodologie prowadzenia projektów"
                    />
                    <input
                        type="text"
                        name="reportingSystems"
                        value={formData.reportingSystems}
                        onChange={handleChange}
                        placeholder="Systemy raportowe"
                    />
                    <label>
                        Zna Scrum
                        <input
                            type="checkbox"
                            name="knowsScrum"
                            checked={formData.knowsScrum}
                            onChange={handleChange}
                        />
                    </label>
                </>
            )}

            <button type="submit">Zarejestruj</button>
        </form>
    );
};

export default RegistrationForm;