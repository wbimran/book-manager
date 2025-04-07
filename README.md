Installation Instructions
Follow these steps to install and activate the Book Manager plugin:

Step 1: Install the Plugin
Download the Plugin:

Download the plugin ZIP file from the Book Manager GitHub repository(https://github.com/wbimran/book-manager).

Upload the Plugin:

Log in to your WordPress admin panel.

Go to Plugins > Add New.

Click on Upload Plugin at the top of the page.

Click Choose File, select the downloaded ZIP file for the Book Manager plugin, and click Install Now.

Activate the Plugin:

After installation, click the Activate button to enable the Book Manager plugin.

Plugin Features
Custom Post Type: Registers a custom post type (CPT) called Book, allowing you to manage books as a separate content type in WordPress.

Shortcode: A shortcode [book_list] is provided to display the book listing. It allows filtering by author and year.

New Book Notification: The plugin sends a notification email to the site administrator whenever a new book post is created. This ensures the site admin is informed of new content.

Shortcode Usage
The Book Manager plugin provides the following shortcode to display a list of books:
[book_list author="Author Name" year="2022"]

Parameters:
author: (Optional) Filter books by a specific author. Enter the author's name in quotes (e.g., "J.K. Rowling").

year: (Optional) Filter books by a specific publication year. Enter the year as a 4-digit number (e.g., "2022").

Example Usage:
To display all books by "J.K. Rowling":
[book_list author="J.K. Rowling"]
To display books by "J.K. Rowling" published in "2022":
[book_list author="J.K. Rowling" year="2022"]

How to Add the Shortcode:
You can add the shortcode to any page, post, or widget in WordPress.

Simply paste the shortcode where you want the book listing to appear.

New Book Notification
The Book Manager plugin automatically sends a notification email to the site administrator whenever a new Book post is published. This is useful for site administrators to keep track of new content.

How It Works:
When a new book post is published, an email notification will be sent to the email address associated with the WordPress site admin.

The notification includes the post title, a link to the new post, and some basic post details.