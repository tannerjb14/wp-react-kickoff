import React, { useState, useEffect } from 'react';
import axios from 'axios';

const RolesDashboard = () => {
  const [roles, setRoles] = useState([]);
  const [expandedRole, setExpandedRole] = useState(null);

  useEffect(() => {
    // Fetch roles from the WordPress backend
    axios.get('/wp-json/gliroles/v1/get_roles/')
      .then(response => setRoles(response.data))
      .catch(error => console.error('Error fetching roles:', error));
  }, []);

  const toggleExpand = (roleName) => {
    setExpandedRole(roleName === expandedRole ? null : roleName);
  };

  return (
    <div>
      <h1 style={{ marginBottom: '10px'}}>GLI Roles and Permissions</h1>
      <div className="tabs-container">
        <div className="tabs">
          {roles.map(role => (
            <div key={role.name} className={`tab ${role.name === expandedRole ? 'active' : ''}`}>
              <input
                type="radio"
                id={role.name}
                name="tabs"
                checked={role.name === expandedRole}
                onChange={() => toggleExpand(role.name)}
              />
              <label htmlFor={role.name}>{role.display_name}</label>
            </div>
          ))}
        </div>
        <div className="tab-content">
          {expandedRole ? (
            <div>
              <h2>Permissions</h2>
              <ul style={{ display: 'flex', flexWrap: 'wrap' }}>
                {roles.find(role => role.name === expandedRole) &&
                  Object.entries(roles.find(role => role.name === expandedRole).capabilities).map(([capability, value]) => (
                    <li key={capability}>
                      <input type="checkbox" checked={value} disabled />
                      <span>{capability}</span>
                    </li>
                ))}
              </ul>
            </div>
          ) : (
            <div>
              <h2>Welcome to the Roles and Permissions Dashboard!</h2>
              <p>
                By clicking on the tabs above you will see all of the available roles and their 
                associated permissions.
              </p>
            </div>
          )}
        </div>
      </div>
    </div>
  );
};

export default RolesDashboard;
