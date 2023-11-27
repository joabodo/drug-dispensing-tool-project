const apiProducts = ['product1', 'product2', 'product3'];

app.post('/api-user/subscribe', authenticateToken, (req, res) => {
  const { product } = req.body;

  if (apiProducts.includes(product)) {
    res.json({ message: `Subscribed to ${product}` });
  } else {
    res.status(404).json({ message: 'Product not found' });
  }
});
