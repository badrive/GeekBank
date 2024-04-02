# GeekBank Web Application Exercise

## Introduction

In this exercise, you will be developing a web application called GeekBank using the Laravel framework. GeekBank is a virtual bank application that allows users to sign up, manage their accounts, perform transactions, and more.

## Requirements

### Sign Up

-   Users should be able to sign up with the following information:
    -   Name
    -   Email
    -   Password
    -   Phone
    -   Gender
    -   City
-   Upon successful signup, the system should generate a unique credit card for the user with the following details:
    -   Card Number
    -   CVC (Card Verification Code)
    -   Expiration Date (MM/YY format)
    -   Unique ID (RIB)
-   Users should receive a welcome email upon successful signup.

### Main View

-   Upon logging in, users should see a sidebar and main content area.
-   The initial balance for each user upon signup is 1500 DH.
    HomePage : cotain balance of each wallet they have
-   The sidebar should contain the following options:

    -   Transfer Money: Allows users to send money to a specific account using the account's RIB. Transactions should be recorded in a transaction history.
    -   My Cards: Users can view their credit cards, block/delete existing cards, or request additional cards. Each user can have a maximum of 2 cards, and they can distribute their balance between the two cards.
    -   Pay Service: Users can pay for services such as electricity or Wi-Fi. Each transaction should be recorded in the transaction history.
    -   Settings: Users can update their profile information.

-   Loan: Users can request a loan up to 200% of their current balance. They can only have one active loan at a time and cannot request another until the first loan is paid off.
-   every minute the user account pay 10% of the loan until the loan is fully paid off

-   Investment Options: Users can invest their funds in various investment options :
-   user will chose between shortInvestement - mediumInvestment - longInvestement
-   shortInvestement : return a 15% from the fund evry 5 sec 10 times
-   mediumInvestment : return a 25% from the fund evry 1 minuts 10 times
-   shortInvestement : return a 50% from the fund evry 5 minuts 10 times

-   Using CoinMarket Api Fetch Crypto data and make a option to buy crypto or sell it and display each crypto balance

History Page : of each transaction

You are required to implement the above features using Laravel. Ensure proper validation, security measures, and a user-friendly interface. Submit your project code along with any necessary documentation.

Happy coding!

frontend
    dashboardController
    settingsController
backend
    userController
    cardController