# A webpage to convert a pdf presentation to jpg slides

The docker image to run LAMP was taken from:

https://github.com/mattrayner/docker-lamp

Here is how to Launch a 18.04 based image:

    docker run -i -t -p "80:80" -v ${PWD}/app:/app mattrayner/lamp:latest

When you run this command, it will create  a subfolder "app" in the current folder. All php content has to reside in this "app" folder. The folder "app" has to have two subfolders:

- uploads - this is where the PDF files are uploaded
- images - this is where the jpg slides will reside

make them writable if they are not
    
     chmod a+w folder
 
Now you need to connect to the running docker machine to install additional libraries:
    
    docker ps 

 Copy the id of the corresponding machine and attach to this machine:

    docker exec -it  8fdb10a00c6c /bin/bash

Run the following commands to install the required software:

    apt-get update
    apt-get install ghostscript
    apt-get install php7.4-imagick

Now edit the file php.ini:

    cd /etc/php/7.4/apache2
    vim php.ini

and add to the extensions section:

     extension=imagick.so

Edit the ImageMagick security policy to be able to open and process uploaded PDF files:

    cd /etc/ImageMagick-6
    vim policy.xml

Change the line below to have the read and write permissions:
    
    <policy domain="coder" rights="read|write" pattern="PDF" />

Restart apache:

    /etc/init.d/apache2 restart

Now, it should work. To view the webpage, please navigate to: 

    http://localhost/index.php

















