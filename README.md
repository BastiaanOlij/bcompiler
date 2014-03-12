bcompiler
=========

Copy of bcompiler with small fixes, origin: http://pecl.php.net/package/bcompiler

This is based on bcompiler 1.0.2.
The attempt for me is to get this running on PHP 5.4 on a Mac OS X 10.8 environment.

Please note, this is just an extract of bcompiler, I do not maintain this source. As far as I can tell this is a dead project.

Requirements
============

XCode
-----
Obviously you need xcode installed with the command line tools in place (no longer installed by default in xCode 4).

AutoConf
--------
You also need autoconf which was missing from my Mac at least, create a temporary folder, open terminal and make sure that folder is the current folder:

# download
curl -O http://ftp.gnu.org/gnu/autoconf/autoconf-latest.tar.gz

# unzip
tar xvfz autoconf-latest.tar.gz

# if there is a newer version this folder may be different!
cd autoconf-2.69/

# and build
./configure
make
sudo make install

Building bcompiler
==================
Open terminal, make sure the folder you've got your bcompiler source code in is current

Setup (needed once)
-------------------
phpize
./configure

Now Build
---------
make
sudo make install

Adjustments to PHP
==================
The make install will put bcompiler.so in your PHP folder. You do need to tell php to load this external by adding
extension=bcompiler.so
To your php.ini

And depending on what you're running you'll need to restart your webserver for PHP to be reloaded.
