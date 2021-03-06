JEDchecker
==========

This extension is able to check your components, modules or plugins for common errors that will prevent you
from publishing your extension on the JED (Joomla! Extensions Directory).

Installing this extension
ZIP packages with the latest stable version of the extension can be found here:
https://compojoom.com/downloads/official-releases-stable/jedchecker

If you are developer and want to contribute to this extension you can fork this repo.

## Building the zip package from this repository
In order to build the installation packages of this library you need to have
the following tools:

- A command line environment. Bash under Linux / Mac OS X . On Windows
  you will need to run most tools using an elevated privileges (administrator)
  command prompt.
- The PHP CLI binary in your path

- Command line Subversion and Git binaries(*)

- PEAR and Phing installed, with the Net_FTP and VersionControl_SVN PEAR
  packages installed

You will also need the following path structure on your system

- com_jedchecker - This repository
- buildtools - Compojoom build tools (https://github.com/compojoom/buildtools)

To execute the build, copy `com_jedchecker/builds/build.properties.txt` renaming it without the `.txt` suffix.

Then in your command line navigate to the `builds` directory and run `phing`

    cd com_jedchecker/builds/
    phing

## Uploading your package
After installing this extension in your Joomla! backend, you can use it by uploading a Joomla! extension-package using
the upload-button. Once uploaded, the contents of the package (your files) will be checked against JED-rules.

## Adding rules
If you want to write a rule have a look a the `administrator/components/com_jedchecker/library/rules` folder.

You just need to add a new file with your rule, for example `yourrule.php`.

The file `yourrule.php` needs to have a class `jedcheckerRulesYourrule` and that class needs to have a
function that accepts the basedir as parameter. This is all - the component will automatically call
your rule check function.

If you are going to contribute your rule to the project, then make sure that it follows the joomla coding conventions
and that it passes the code sniffer: http://docs.joomla.org/Joomla_CodeSniffer

## Checking on existing files and folders
The extension also supports a scan of a pre-defined set of existing files and folders.
For this to work, add a list of folders to a textfile `tmp/jed_checker/local.txt`.
There should be a folder on each line. 
Once the file exists, a "Check" button becomes visible in the jedchecker-toolbar. Just hit it.

Example `tmp/jed_checker/local.txt` file:

        components/com_weblinks
        administrator/components/com_weblinks
        plugins/system


## COPYRIGHT AND DISCLAIMER
CMandrill -  Copyright (c) 2008-2013 Compojoom.com

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the
Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program. If not, see http://www.gnu.org/licenses/.
