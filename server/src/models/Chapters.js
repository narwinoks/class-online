module.exports = (sequelize, DataTypes) => {
  const Chapters = sequelize.define(
    "Chapters",
    {
      id: {
        type: DataTypes.INTEGER,
        autoIncrement: true,
        primaryKey: true,
        allowNUll: false,
      },
      name: {
        type: DataTypes.STRING,
        allowNUll: false,
      },
      course_id: {
        type: DataTypes.INTEGER,
        allowNUll: false,
      },
      createdAt: {
        type: DataTypes.DATE,
        field: "created_at",
        allowNUll: false,
      },
      updatedAt: {
        type: DataTypes.DATE,
        field: "updated_at",
        allowNUll: false,
      },
    },
    {
      tableName: "chapters",
      timestamps: true,
    }
  );
  Chapters.associate = (models) => {
    Chapters.hasMany(models.Lessons, {
      foreignKey: "chapter_id",
    });
  };

  return Chapters;
};
