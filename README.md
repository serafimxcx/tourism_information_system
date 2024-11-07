# FordaTravel: Tourism Information System

Welcome to the **FordaTravel** repository! This project is a **Tourism Information System** designed to help municipalities, businesses, and tourists interact with and manage various tourism-related content. Developed using **PHP**, **JavaScript**, **jQuery**, **CSS**, **HTML**, and **MySQL**, FordaTravel serves as a platform for promoting local destinations, services, and events while enabling social interactions among users.

## Project Overview

FordaTravel allows three types of users to access and manage different kinds of content:

1. **Municipality Users**: Manage destinations, events, news, services, and travel guidelines.
2. **Business Users**: Manage content related to their own businesses (e.g., hotels, restaurants).
3. **Regular Users (Tourists)**: Browse destinations, rate them, engage socially, and bookmark important content.

This system is designed to create a dynamic and interactive platform for both local businesses and tourists, allowing them to exchange information, share experiences, and promote tourism in the region.

## Features

### 1. **Municipality User Features**
   - **Manage Destinations**: Add, update, or delete destinations such as hotels, restaurants, museums, heritage walks, pasalubong centers, and natural wonders. Each destination can include information such as:
     - Name, description, and amenities
     - Price range, availability, and contact information
   - **Manage News and Events**: Post and manage news and events relevant to the municipality, providing tourists with up-to-date information.
   - **Manage Services**: Add and update services such as hospitals, hotlines, travel guidelines, and convenience stores, ensuring tourists have essential information available.
   
### 2. **Business User Features**
   - **Manage Business Content**: Business users can add and update information related to their businesses, such as hotels, restaurants, and other establishments. Features include:
     - Business name, description, contact information, and services offered
     - Price range and availability information

### 3. **Regular User (Tourist) Features**
   - **Browse Destinations**: Tourists can explore various destinations, including hotels, restaurants, museums, and more. 
   - **Rate Destinations**: Tourists can rate destinations based on their experiences to help other travelers make informed decisions.
   - **Social Interaction**: Engage with other users by:
     - Posting content (status updates, experiences, photos)
     - Liking, commenting on, and sharing posts
   - **Bookmark Events, News, and Travel Guidelines**: Tourists can bookmark important events, news, or travel guidelines to access them easily later.

## Technologies Used

- **PHP**: Server-side scripting language for handling business logic and interacting with the database.
- **MySQL**: Database management system used to store user data, destinations, events, and other information.
- **JavaScript & jQuery**: Used for dynamic front-end interactions, such as submitting forms, liking posts, and filtering data.
- **HTML & CSS**: To structure and style the front-end user interface, ensuring a responsive and user-friendly design.
- **Bootstrap**: A front-end framework used to create a responsive layout that adapts to different screen sizes.

## Getting Started

To set up the FordaTravel application locally, follow these steps:

### Prerequisites

- **XAMPP**, **WAMP**, or **LAMP** server for running PHP and MySQL.
- A modern web browser to access the application.

### Steps to Run the Project

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/tourism_information_system.git
   ```

2. **Set up the database**:
   - Import the provided SQL file into your MySQL database to create the necessary tables.
   - Configure the database connection in the `config.php` file by entering your MySQL credentials.

3. **Access the project**:
   - Open your local server (e.g., XAMPP, WAMP) and start the Apache and MySQL services.
   - Navigate to the project directory in your browser (e.g., `http://localhost/fordatravel`).

4. **Sign up or log in**:
   - You can register as a municipality, business, or regular user from the login page.


## Features Summary

- **For Municipality Users**:
  - Add, update, or delete destination information
  - Manage news, events, and services
  - Provide essential services like hospitals, travel guidelines, etc.
  
- **For Business Users**:
  - Manage business-specific content such as hotels, restaurants, and attractions
  
- **For Regular Users (Tourists)**:
  - Rate, browse, and bookmark destinations
  - Interact socially with other users (like, comment, share content)
  
## Contributing

We welcome contributions to improve and extend the functionality of FordaTravel! If you would like to contribute, follow these steps:

1. Fork the repository.
2. Create a new branch for your changes.
3. Make the necessary changes or additions.
4. Submit a pull request to the `main` branch with a detailed description of the changes.

---

**FordaTravel** is your go-to web platform for exploring and managing tourism-related information. Whether you are a local municipality, a business, or a tourist, FordaTravel provides all the tools you need to explore, manage, and interact with tourism content.
