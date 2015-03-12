### steps

- get into the git folder in terminal
#### git Log
 - To check the commits.
 
#### git status
- To check any files to be committed.

#### git add .
- To add the all files(edited/change) to git

#### git add (path)
- to add a specific file from all the changed files

#### git commit -m "message"
- Commit the files locally
- message - desired message

#### git push
- Push locally committed folder to remote server
- **git pull** to give a pull request in remote

#### git remote add upstream 'url'
- **_A{Master}_** --(fork)--> **_B{branch}_** --(pull)--> **_C{local}_** <---(_fetch upstram_)--- **_A{master}_**  

#### git fetch upstream 
- to get updates from A{master} directly to lacal

#### git pull master
- download the contents from master

#### git pull upstream master
- download the all files from upstream master

### git config --get remote.upstream.url
- to check the upsteam url

### git config --get remote.origin.url
- to view master url

### 


### git reset HEAD --hard
- to clear all uncommitted changes in working Head

### Creating new repository and initilize it as git

#### create Folders(repository)

#### git init
- initilise the repository for git operations (commit, revert,
add...)

#### git clone 'url'

- copy remote reposytory to local

### Other git commands
#### git reset 'commit id'
- reset the files to a particular commit and delete all commits after 'commit id'

#### git stash
 - delete the non- committed changes from repository (which is espessialy added)
 
#### git stash --patch
 - to remove unwanted files from git add --all while commiting 
 - y- to stash(not add)
 - n - ! stash (add )
    
#### git checkout -b branch_name
 - create a branch and continoue working in that branch

#### git branch -D branch_name
- to delete branch from local repository
- not possible to delete HEAD branch

#### git branch branch_name
- to create a new branch
 
 
#### git branch
- to show current branch

#### git checkout master/'branch_name'
- to switch to required branch or master

#### git merge branch_name
- to merge branch to HEAD
- or merge master to HEAD

#### git push origin --delete branch-name
- to remove branch from remote repository

#### git push origin branch_name --force
- to update(push) forcefully
- eg:in case of conflict

#### git remote set-url origin //http/url/....
to change origin master 

### reference
[git #3](http://git-scm.com/book/commands)

[git commands #1](https://confluence.atlassian.com/display/STASH/Basic+Git+commands)

[git #2](http://gitref.org/
)


### color git 
- $ git config color.ui true
- $ git config  --global color.ui true - FOR ALL 