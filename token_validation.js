const {verify} = require('jsonwebtoken');

module.exports = {
    checkToken: (req, res, next) => {
        let token = req.get("authorization");
        if(token){
            token = token.slice(7);
            verify(token, process.env.JWT_KEY, (err, decoded) => {
                if(err){
                    res.json({
                        success: 0,
                        message: "Invalid Token"
                    });
                }else{
                    next();
                }
            });
        }else{
            res.json({
                success: 0,
                message: "Access Denied! Unauthorized User"
            });
        }
    }
}
function authenticateToken(req, res, next) {
    const token = req.headers['authorization'];
  
    if (!token) return res.status(401).json({ message: 'Token not provided' });
  
    jwt.verify(token, 'your-secret-key', (err, user) => {
      if (err) return res.status(403).json({ message: 'Invalid token' });
  
      req.user = user;
      next();
    });
  }
  