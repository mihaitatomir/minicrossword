# MiniCrosswordTest

1. Which infrastructure resources you would need to run the utility daily in an automated fashion?
- A LAMP server and a cronjob.

2. How would you deploy your code to the infrastructure?
- The deploy will be trough git

3. How would you automate your deployments so that each push to your default branch will trigger a deployment to your production environment?
- There are several methods to do this. One of them is and i think the easy one is with post-receive hooks and bare git repository.

4. Is it possible to get the data about past crosswords? If yes, how would you build a solution to get all the historical crosswords data?
- Yes, it is possible. Just choose a date from the input and hit *Submit* button. Will get the data for the selected date only.
- To get all the historical data hit the *Get all historical data* button.