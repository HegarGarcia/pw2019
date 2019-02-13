import { Router } from 'express';

const app = Router();

app.get('/', (_, res) => {
  res.status(200).send('OK!');
});

export default app;
