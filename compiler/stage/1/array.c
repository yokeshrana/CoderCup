#include<stdio.h>
void main()
{
int a[100],b[100],n,i;
scanf("%d",&n);
for(i=0;i<n;i++)
{
scanf("%d",&a[i]);
}
for(i=1;i<n;i++)
{
b[0]=a[n-1];
b[i]=a[i+1];
}
for(i=0;i<n;i++)
{
printf("%d",b[i]);
}
}