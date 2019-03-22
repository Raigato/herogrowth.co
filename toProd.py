import sys
import ftplib

def help():
  print("Use as this: python toProd.py [-option/filename]")
  print("Options:")
  print("\tDefault: Uploads only html pages")
  print("\tWith Filename: Only uploads selected file")
  print("\t-h: help")
  print("\t-a: All Files and Folders /!\\ Doesn't work for now")

def uploadFile(filename):
  ftp = ftplib.FTP()
  host = "ftp.cluster027.hosting.ovh.net"
  port = 21
  username = "herogrowns"
  password = "dU4Gn4e7uzpA8YGa"
  ftp.connect(host, port)
  try:
    ftp.login(username, password)

    ftp.cwd("www")

    print("Uploading %s" % filename)
    with open(filename, 'rb') as f_in:
      ftp.storbinary('STOR %s' % filename, f_in)
    ftp.quit()

  except:
    print("Failed to connect to FTP")

def uploadLight():
  filesToUpload = ["404-page.html", "qui-sommes-nous.html", "audit.html", "contact.html", "index.html", "kebab.html", "our-team.html", "services.html", "mentions-legales.html"]

  ftp = ftplib.FTP()
  host = "ftp.cluster027.hosting.ovh.net"
  port = 21
  username = "herogrowns"
  password = "dU4Gn4e7uzpA8YGa"
  ftp.connect(host, port)
  try:
    ftp.login(username, password)

    ftp.cwd("www")

    for fileToUpload in filesToUpload:
      print("Uploading %s" % fileToUpload)
      with open(fileToUpload, 'rb') as f_in:
        ftp.storbinary('STOR %s' % fileToUpload, f_in)
    ftp.quit()
  except:
    print("Failed to connect to FTP")

if __name__ == "__main__":
  if len(sys.argv) > 1:
    if sys.argv[1] == "-h":
      help()
    elif sys.argv[1] == "-a":
      #TODO: Folders
      pass
    else:
      uploadFile(sys.argv[1])
  else:
    uploadLight()
