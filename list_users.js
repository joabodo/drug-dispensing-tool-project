const pool = require("../drug-dispensing-tool-main/database");
app.get('/api/users', authenticateToken, (req, res) => {
    // Return the list of all users
    const allUsers = {
        getUsers: callBack=>{
        pool.query(
            `SELECT id,f_name,l_name,age,email FROM person`,
            [],
            (error, results, fields) => {
                if(error){
                    return callBack(error);
                }
                return callBack(null, results);
            }
        );
    }}
    res.json(allUsers);
  });
  
  app.get('/api/users/:idOrEmail', authenticateToken, (req, res) => {
    const { idOrEmail } = req.params;
    const userDetails = {getUsersById: (id,callBack)=>{
        pool.query(
            `SELECT id,f_name,l_name,age,email FROM person WHERE id = ?`,
            [id],
            (error, results, fields) => {
                if(error){
                    return callBack(error);
                } 
                return callBack(null, results[0]);
            }
        );
    }};
    res.json(userDetails);
  });
  
  // Add similar routes for other user-related queries
  