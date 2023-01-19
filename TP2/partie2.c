#include "mini_lib.h"



#define LTEMPS 32

void mini_ls_l(){
    DIR *dirp;
    struct dirent *dp;
    struct stat *statbuff = (struct stat *)malloc(sizeof(struct stat));

    struct passwd *pw;
    struct group *gr;
    char type;
    char pws[9], grs[9], temps[LTEMPS];

    if ((dirp = opendir(".")) == NULL)
    {
        perror("couldn't open");
    }
    while ((dp = readdir(dirp)))
    {
        char *path = calloc(100, sizeof(char));
        strcat(path, "");
        strcat(path, dp->d_name);
        if (stat(path, statbuff) != -1)
        {
            type = '?';
            if S_ISREG (statbuff->st_mode)
                type = '-';
            else if (S_ISDIR(statbuff->st_mode))
                type = 'd';
            else if (S_ISCHR(statbuff->st_mode))
                type = 'c';
            else if (S_ISBLK(statbuff->st_mode))
                type = 'b';
            else if (S_ISFIFO(statbuff->st_mode))
                type = 'p';
            strftime(temps, LTEMPS, "%a,%e %h %Y %H:%M:%S", localtime(&(statbuff->st_mtime)));
            pw = getpwuid(statbuff->st_uid);
            if (pw != NULL)
                strcpy(pws, pw->pw_name);
            else
                sprintf(pws, "%8d", (int)statbuff->st_uid);
            gr = getgrgid(statbuff->st_gid);
            if (gr != NULL)
            {
                strcpy(grs, gr->gr_name);
            }
            else
            {
                sprintf(grs, "%8d", (int)statbuff->st_gid);
            }

            printf("%c%c%c%c%c%c%c%c%c%c %2ld %8s %8s %9ld %s %s\n",
                   type,
                   statbuff->st_mode & S_IRUSR ? 'r' : '-',
                   statbuff->st_mode & S_IWUSR ? 'w' : '-',
                   statbuff->st_mode & S_IXUSR ? 'x' : '-',
                   statbuff->st_mode & S_IRGRP ? 'r' : '-',
                   statbuff->st_mode & S_IWGRP ? 'w' : '-',
                   statbuff->st_mode & S_IXGRP ? 'x' : '-',
                   statbuff->st_mode & S_IROTH ? 'r' : '-',
                   statbuff->st_mode & S_IWOTH ? 'w' : '-',
                   statbuff->st_mode & S_IXOTH ? 'x' : '-',
                   statbuff->st_nlink,
                   pws,
                   grs,
                   statbuff->st_size,
                   temps,
                   dp->d_name);
        }
    }
    if (errno != 0)
        perror("error reading dir");
}


void mini_touch(const char *filename) {
    int fd;
    struct stat statbuf;

    if (stat(filename, &statbuf) == -1) {
        fd = open(filename, O_CREAT | O_WRONLY, S_IRUSR | S_IWUSR);
        close(fd);
    }
}



    



void mini_echo(const char *str) {
    write(1, str, strlen(str));
    write(1, "\n", 1);
}



void mini_chmod(char* file, int permissions){
    chmod(file, permissions);
}


void mini_cp(const char *src, const char *dst) {
    int src_fd, dst_fd;
    char buffer[IOBUFFER_SIZE];
    ssize_t bytes_read, bytes_written;

    src_fd = open(src, O_RDONLY);
    if (src_fd == -1) {
        perror("Error opening source file");
    }

    dst_fd = open(dst, O_CREAT | O_WRONLY, S_IRUSR | S_IWUSR);
    if (dst_fd == -1) {
        perror("Error opening destination file");
    }

    while ((bytes_read = read(src_fd, buffer, sizeof(buffer))) > 0) {
        bytes_written = write(dst_fd, buffer, bytes_read);
        if (bytes_written == -1) {
            perror("Error writing to destination file");
        }
    }

    close(src_fd);
    close(dst_fd);
}


void mini_ln(char* oldlink, char* newlink){
    int lk = link(oldlink, newlink);
    if (lk<0){
        perror("error creation link");
    }
}

void mini_quickdiff(char* src, char* dst){
    int srcfd,dstfd;
    int bytes_readsrc, bytes_readdst;
    int ligne = 1;
    int debutligne = 1;
    int lignebuffer=0;
    int k=0;
    char buffer1[IOBUFFER_SIZE], buffer2[IOBUFFER_SIZE];
    if ((srcfd= open(src, O_RDONLY))<0 || (dstfd= open(dst, O_RDONLY))<0){
        perror("problem opening file");
    }
    while ((bytes_readsrc= read(srcfd, buffer1, sizeof(buffer1)))>0 && (bytes_readdst = read(dstfd, buffer2, sizeof(buffer2)))>0){
        if ((bytes_readsrc <0) || (bytes_readdst<0)){
            perror("reading files");
        }
        for (int i=0; i< bytes_readsrc;i++){
            if (buffer1[i]=='\n'){
                debutligne= i+1;
                ligne++;
            }
            if (buffer1[i]!=buffer2[i]){               
                if (lignebuffer!= debutligne){
                    printf("erreur ligne%d\n", ligne);
                    lignebuffer =debutligne;
                    
                    while (true){
                        if (buffer1[k+debutligne=='\n']){
                            k=0;
                            break;
                        }
                        printf("%c", buffer1[k+debutligne]);
                        k++;
                    }
                    while (true){
                        if (buffer2[k+debutligne=='\n']){
                            k=0;
                            break;
                        }
                        printf("%c", buffer2[k+debutligne]);
                        k++;
                    }

                    }
                }
            }
    }

}

void mini_mkdir(char* repertoire){
    if (mkdir(repertoire, 0777)==-1){
        perror("erreur creating repertoire");
    }
}

void mini_mv(char* src, char* dst){
    mini_cp(src, dst);
    if (unlink(src)==-1){
        perror("problem deleting the file");
    }
}


void mini_rm(char* file){
    struct stat file_info;
    if (stat(file, &file_info)==-1){
        perror("pblm file info");
    }
    if (!S_ISREG(file_info.st_mode)) {
        perror(" is not a regular file\n");
    }
    if (unlink(file)==-1){
        perror("error deleting file");
    }    
}

void mini_rmdir(char* file){
    struct stat file_info;
    if (stat(file, &file_info)==-1){
        perror("pblm file info");
    }
    if (!S_ISDIR(file_info.st_mode)) {
        perror(" is not a regular file\n");
    }
    if (unlink(file)==-1){
        perror("error deleting file");
    }  
}
