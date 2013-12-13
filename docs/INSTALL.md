## INSTALLATION

Please follow the following steps for installing AidStream.

1. Clone the code from the git repository.

2. Create a database and import the schema.sql file and initial_data.sql file.
    
3. Make a copy of default.application.ini as application.ini in application/configs.
    - Change the db parameters to match your db configuration
    - Aidstream uses subdomain name to determine various environment as
        - aidstream.org , http://localhost/aidstream => PRODUCTION
        - dev.aidstream.org => DEVELOPMENT
        - stage.aidstream.org => STAGING
        - demo.aidstream.org => DEMO
    
    ** PRODUCTION environment is the default environment.

4. Make sure the data/log, data/session folders are writable.(Please create the
folders in case they are missing)

5. Make sure the public/files/xml , public/files/csv/uploads , public/files/documents
and public/uploads/image are writable (Please create the folders in case they
are missing ).

6. Zend Framework should be in your php include path. In case zend framework is
not in include path ( e.g you get a reqired file 'Zend/Application.php' not found error),
    - Set up zend framework and add it to include path
    OR
    - Download Zend Framework and place it in library folder.( library/Zend )

** Note that the version of Zend Framework tested with AidStream is 1.12.0

** AidStream does not support ZendFramework 2.

7. Clone the snapshot, how-to, how-to-simplified and blog from their respective
repositories to the public folder.


