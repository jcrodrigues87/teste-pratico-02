# Generated by Django 3.1.1 on 2020-10-01 23:13

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Profiles',
            fields=[
                ('name', models.CharField(help_text='DD/MM/AAAA', max_length=100)),
                ('birth', models.CharField(help_text='DD/MM/AAAA', max_length=10)),
                ('email', models.CharField(max_length=100, unique=True)),
                ('telephone', models.CharField(help_text='(DDD) 9XXXX-XXXX', max_length=16)),
                ('cod', models.AutoField(primary_key=True, serialize=False)),
                ('cep', models.CharField(help_text='XXXXX-XXX', max_length=16)),
                ('uf', models.CharField(max_length=2)),
                ('city', models.CharField(max_length=100)),
                ('street', models.CharField(max_length=100)),
                ('complement', models.CharField(max_length=100)),
                ('java', models.BooleanField(default=False, verbose_name='Java')),
                ('node', models.BooleanField(default=False, verbose_name='Node.js')),
                ('cpp', models.BooleanField(default=False, verbose_name='C++')),
                ('php', models.BooleanField(default=False, verbose_name='PHP')),
                ('python', models.BooleanField(default=False, verbose_name='Python')),
                ('go', models.BooleanField(default=False, verbose_name='Go')),
                ('advpl', models.BooleanField(default=False, verbose_name='ADVPL')),
                ('angular', models.BooleanField(default=False, verbose_name='Angular')),
                ('electron', models.BooleanField(default=False, verbose_name='Electron')),
                ('react', models.BooleanField(default=False, verbose_name='React')),
                ('native', models.BooleanField(default=False, verbose_name='React Native')),
                ('mongo', models.BooleanField(default=False, verbose_name='MongoDB')),
                ('sql', models.BooleanField(default=False, verbose_name='MySQL')),
                ('sqlServer', models.BooleanField(default=False, verbose_name='SQLServer')),
                ('postgres', models.BooleanField(default=False, verbose_name='Postgres')),
                ('backend', models.BooleanField(default=False, verbose_name='Backend')),
                ('frontend', models.BooleanField(default=False, verbose_name='Front-End')),
            ],
        ),
        migrations.CreateModel(
            name='Formations',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('course', models.CharField(max_length=100)),
                ('institute', models.CharField(max_length=100)),
                ('conclusion', models.DateField()),
                ('profile', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='profiles.profiles')),
            ],
        ),
    ]
